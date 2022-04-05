const { __ } = wp.i18n; // Import __() from wp.i18n
const { useState, Fragment, useEffect } = wp.element;
const {
    ToggleControl,
    Placeholder,
    Spinner,
    Panel,
    PanelBody,
    PanelRow,
} = wp.components;
const {
    InspectorControls,

} = wp.editor;

export default function Edit(props) {

    const [users, setUsers] = useState([])
    const [loading, setLoading] = useState(true);

    let id = props.attributes.id;
    let fname = props.attributes.fname;
    let lname = props.attributes.lname;
    let email = props.attributes.email;
    let date = props.attributes.date;


    const getHeads = (heads) => {
        const th = heads.map((item) => {
            if (item === 'ID' && ! id ) {
                return;
            }
            if (item === 'First Name' && ! fname ) {
                return;
            }
            if (item === 'Last Name' && ! lname ) {
                return;
            }
            if (item === 'Email' && ! email ) {
                return;
            }
            if (item === 'Date' && ! date ) {
                return;
            }
            return (
                <th>{item}</th>
            );
        });
        return th;
    }
    const getRows = (rows) => {
        const td = Object.values(rows).map((item) => {
            return (
                <tr>
                    {id ? <td>{item.id}</td> : ''}
                    {fname ? <td>{item.fname}</td> : ''}
                    {lname ? <td>{item.lname}</td> : ''}
                    {email ? <td>{item.email}</td> : ''}
                    {date ? <td>{item.date}</td> : ''}
                </tr>
            );
        })
        return td;
    }
    const usersList = (users) => {
        return (
            <Fragment>
                <h2>
                    {users.data.title}
                </h2>
                <table>
                    <thead>
                        {getHeads(users.data.data.headers)}
                    </thead>
                    <tbody>
                        {getRows(users.data.data.rows)}
                    </tbody>
                </table>
            </Fragment>
        )
    }
    useEffect(async () => {
        const formData = new FormData();
        formData.set('action', 'aw_task_user_list');
        formData.set('nonce', awData.nonce);
        const post = await fetch(awData.url, {
            method: 'POST',
            body: formData
        });
        setLoading(false);
        const response = await post.json();
        setUsers(response);
    }, []);
    return (

        <Fragment>
            {
                loading ?
                    <Placeholder label={__('Loading users list...', 'plugin-starter')}>
                        <Spinner />
                    </Placeholder>
                    :
                    <div className='plugin-starter-users-list'>
                        <InspectorControls key="setting">
                            <div id="plugin-starter-controls">
                                <Panel>
                                    <PanelBody title={__('Column Visibility', 'plugin-starter')} initialOpen={true}>
                                        <PanelRow>
                                            <ToggleControl
                                                label={__('Show ID', 'plugin-starter')}
                                                checked={id}
                                                onChange={() => { props.setAttributes({ id: !id }); console.log(id) }}
                                            />
                                        </PanelRow>
                                        <PanelRow>
                                            <ToggleControl
                                                label={__('Show First Name', 'plugin-starter')}
                                                checked={fname}
                                                onChange={() => { props.setAttributes({ fname: !fname }) }}
                                            />
                                        </PanelRow>
                                        <PanelRow>
                                            <ToggleControl
                                                label={__('Show Last Name', 'plugin-starter')}
                                                checked={lname}
                                                onChange={() => { props.setAttributes({ lname: !lname }) }}
                                            />
                                        </PanelRow>
                                        <PanelRow>
                                            <ToggleControl
                                                label={__('Show Email', 'plugin-starter')}
                                                checked={email}
                                                onChange={() => { props.setAttributes({ email: !email }) }}
                                            />
                                        </PanelRow>
                                        <PanelRow>
                                            <ToggleControl
                                                label={__('Show Date', 'plugin-starter')}
                                                checked={date}
                                                onChange={() => { props.setAttributes({ date: !date }) }}
                                            />
                                        </PanelRow>
                                    </PanelBody>
                                </Panel>
                            </div>
                        </InspectorControls>
                        {users && users.data ? usersList(users) : ''}
                    </div>
            }

        </Fragment>
    );
}