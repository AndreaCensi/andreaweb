import YAML


def main():
    definitions = 'software.yaml'
    groups = 'groups.yaml'
    head = 'software.page.head'
    output = 'index.page'
    output = 'index.html'
    
    projects = YAML.load_all(open(definitions))
    groups = YAML.load_all(open(groups))
    
    projects = [p for p in projects if not p.get('hide', False)]
    
    f = open(output,'w')
    with open(head) as hf:
        f.write(hf.read())
    render(groups, projects, f)

def render(groups, projects, f):
    
    project_groups = set([p['group'] for p in projects])
    
    
    for g in groups:
        gp = [p for p in projects if p['group'] == g['id']]
    
        d=dict(name=g['name'], desc=md2html(g['desc']))
        f.write(group_template.format(**d))
        
        f.write(table_head)
        for p in gp:
            d=dict( name=p['name'],
                    active=string_active(p),
                    status=string_status(p),
                    language=string_language(p),
                    desc_html=md2html(p))
            f.write(row_template.format(**d))
        f.write(table_foot)
    
    all_group_id = [g['id'] for g in groups]
    for p in projects:
        if p['group'] not in all_group_id:
            print('Warning: unknown group %r' % p['group'])
    
group_template = 
"""
<h2> {name} </h2>
<p> {desc} </p>
        
"""
table_head = """
<table class='projects'>
<tr class='header'>
    <td>Name</td>
    <td>Active</td>
    <td>Status</td>
    <td>Language</td>
    <td>Description</td>
</tr>

"""
table_foot = """

</table>
"""

row_template = """
    <tr class='project'>
        <td>{name}</td>
        <td>{active}</td>
        <td>{status}</td>
        <td>{language}</td>
        <td>{desc_html}</td>
    </tr>
"""
def string_active(p):
    options = dict(yes='yes',
                    no='no',
                    maintained='Maintained',
                    others='By others')
    return options[p.get('active')]

def string_status(p):
    options = dict(production='Stable',
                    beta='Beta',
                    alpha='Alpha')
    return options[p.get('status')]

def string_language(p):
    return p['language']

def md2html(s):
    return s
    
if __name__ == '__main__':
    main()