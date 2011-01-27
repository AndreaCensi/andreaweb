import yaml, shutil, sys


def main():
    groups = sys.argv[1]
    definitions = sys.argv[2]
    output = sys.argv[3]
    
    projects = list(yaml.load_all(open(definitions)))
    groups = list(yaml.load_all(open(groups)))
    
    projects = [p for p in projects if not p.get('hide', False)]
    
    with open(output,'w') as f:
        render(groups, projects, f)
    
    shutil.copyfile(output, output+'.html')
    
def render(groups, projects, f):
    
    project_groups = set([p['group'] for p in projects])
    
    for g in groups:
        gp = [p for p in projects if p['group'] == g['id']]
    
        d=dict(name=g['name'], desc=md2html(g['desc']))
        f.write(group_template.format(**d))
        
        f.write(table_head)
        for p in sorted(gp, key=lambda x: -x['date']):
            d=dict( name=p['name'],
                    active=string_active(p),
                    status=string_status(p),
                    language=string_language(p),
                    year = p['date'],
                    url=get_url(p),
                    desc_html=md2html(p['desc']))
            row =row_template.format(**d)
            f.write(row)
        f.write(table_foot)
    
    all_group_id = [g['id'] for g in groups]
    # print('Groups used by projects: %r' % project_groups)
    # print('Groups declared: %r' % all_group_id)
    for pg in project_groups:
        if pg not in all_group_id:
            print('Warning: unknown group %r' % pg)
    
group_template = """
<h2 class='group_name'> {name} </h2>
<p class='group_desc'> {desc} </p>
        
"""
table_head = """
<table class='projects'>
<tr class='header'>
    <td class='name'></td>
    <td class='year'>started</td>
    <td class='active'>active</td>
    <td class='status'>status</td>
    <td class='language'>language</td>
    <td class='desc'></td>
</tr>

"""
table_foot = """

</table>
"""

row_template = """
    <tr class='project'>
        <td class='name'><a href='{url}'>{name}</a></td>

        <td class='year' >{year}</td>
        <td class='active' >{active}</td>

        <td class='status'>{status}</td>
        <td class='language'>{language}</td>
        <td class='desc'>{desc_html}</td>
    </tr>
"""
def string_active(p):
    active = '<img class="activity_icon" src="icons/status/activity-active.png" alt="active"/>'
    no = '<img class="activity_icon" src="icons/status/activity-notactive.png" alt="not active"/>'
    maintained = '<img class="activity_icon" src="icons/status/activity-maintained.png" alt="maintained by me"/>'
    others =  '<img class="activity_icon" src="icons/status/activity-others.png" alt="maintained by others"/>'
    
    options = { True: active,
                False: no,
                    'maintained': maintained,
                    'others': others}
    return get(p, 'active', options)

def get(record, field, options=None):
    rid = record.get('name', record)
    if not field in record or record[field] is None:
        print('Record %r does not have %r.' % (rid, field))
        return '!'
    value = record[field]
    if options is None:
        return value
    else:
        if not value in options:
            print('Record %r has strange choice %r for %r (I want %r) ' % (rid, value, field,options.keys()))
            return '?'
        return options[value]
        
def get_url(p):
    return get(p, 'url')
    
def string_status(p):
    
    options = dict(production='<img class="status_icon" src="icons/status/status-stable.png" alt="stable"/>',
                    beta='<img class="status_icon" src="icons/status/status-beta.png" alt="beta"/>',
                    alpha='<img class="status_icon" src="icons/status/status-alpha.png" alt="alpha"/>')
    return get(p, 'status', options)

def string_language(p):
    language = p.get('language', None)
    if language is None:
        print('No language for %r' % p['name'])
        return '?'
    return language
import markdown
def md2html(s):
    if s is None:
        s = '?'
    html = markdown.markdown(s)
    if '[' in html:
        print('Markdown did not convert everything:\n------\n%s\n-------\n%s\n-----' %
                (s,html))
        
    return html.encode("utf-8")
if __name__ == '__main__':
    main()