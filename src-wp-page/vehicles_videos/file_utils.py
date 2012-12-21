from collections import defaultdict
from contracts import contract
import fnmatch
import os


@contract(returns='list(str)', directory='str',
          pattern='str', followlinks='bool')
def locate_files(directory, pattern, followlinks=True):
    filenames = []
    for root, _, files in os.walk(directory, followlinks=followlinks):
        for f in files:
            if fnmatch.fnmatch(f, pattern):
                filename = os.path.join(root, f)
                filenames.append(filename)

    real2norm = defaultdict(lambda: [])
    for norm in filenames:
        real = os.path.realpath(norm)
        real2norm[real].append(norm)
        #print('%s -> %s' % (real, norm))

    for k, v in real2norm.items():
        if len(v) > 1:
            msg = 'In directory:\n\t%s\n' % directory
            msg += 'I found %d paths that refer to the same file:\n'
            for n in v:
                msg += '\t%s\n' % n
            msg += 'refer to the same file:\n\t%s\n' % k
            msg += 'I will silently eliminate redundancies.'
            #print.warning(v)

    return real2norm.keys()


import pickle
def disk_cache(func):
    # Processes a file or directory, caching results 
    # Assumes that the wrapped function has only one arg (for simplicity).
    def wrapper(filename):
        if os.path.isdir(filename):
            cache = os.path.join(filename, '%s.pickle' % func.__name__)
        else:
            cache = os.path.splitext(filename)[0] + '.%s.pickle' % func.__name__
        if (os.path.exists(cache) and
            (os.path.getmtime(cache) > os.path.getmtime(filename))):
            # print('Using cache %r' % cache)
            try:
                return pickle.load(open(cache, 'rb'))
            except:
                print('corrupted %s' % cache)

    
        # print('Creating cache %r' % cache)
        result = func(filename)
        with open(cache, 'wb') as f:
            pickle.dump(result, f)
        return result
    return wrapper
