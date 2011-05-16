from string import Template
import sys, os

class MyTemplate(Template):
    delimiter = '$$$'

try:
    data = {}
    for f in sys.argv[1:]:
        name = os.path.splitext(os.path.basename(f))[0]
        data[name] = open(f).read()

    result = MyTemplate(data['main']).substitute(**data)

    print result

except Exception as e:
    sys.stderr.write(str(e))
    sys.exit(-1)