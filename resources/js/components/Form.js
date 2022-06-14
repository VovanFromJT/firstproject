import React, {useState} from 'react';

function RenderArray(props) {
    return (
        <tbody>
            {props.outputArray?.map((row, index) => (
                <tr key={index}>
                    {row.map((item, index) => (
                        <td key={index}>
                            {item}
                        </td>
                    ))}
                </tr>
            ))}
        </tbody>
    )
}

export default function Form() {
    const url = 'https://21cb-5-58-50-180.eu.ngrok.io/api';
    const [size, setSize] = useState("2");
    const [kind, setKind] = useState("Horizontal");
    const [name, setName] = useState("");
    const [outputArray, setOutputArray] = useState([]);
    const [status, setStatus] = useState(100);
    const [message, setMessage] = useState("Input data:)");

    const statusAlert = {
        100: 'dark',
        200: 'success',
        400: 'warning',
        500: 'danger'
    }

    const sizeChange = (e) => (
        setSize(e.target.value)
    )

    const kindChange = (e) => (
        setKind(e.target.value)
    )

    const displayArray = async (e) => {
        e.preventDefault();
        await handleDisplay('/sort', e.target.formMethod, e.target.value, 'json')
    }

    const fileArray = async (e) => {
        e.preventDefault();
        await handleDisplay('/file', e.target.formMethod, e.target.value, 'blob')
    }

    const dbRecordArray = async (e) => {
        e.preventDefault();
        await handleDisplay('/dbrecord', e.target.formMethod, e.target.value, 'json')
    }

    const handleDisplay = async (address, method, action, responseType) => {
        await axios({
            url: url + address,
            method: method,
            params: {
                sizeArray: size,
                kindSort: kind,
                action: action
            },
            responseType: responseType
        })
            .then(await (response => {
                if (responseType === "json") {
                    setName(response.data.name)
                    setMessage(response.data.message)
                    setOutputArray(response.data.outputArray)
                    setStatus(response.data.status)
                } else if (responseType === "blob") {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', kind + '.txt');
                    document.body.appendChild(link);
                    link.click();
                }
            }))

    }

    return (
    <>
        <form>
            <div className="container-fluid">
                <label className="mx-3">
                    <label className="mx-3" htmlFor="size">
                        Size:
                    </label>
                    <input type="number" id="size" name="sizeArray" step="1" min="2" max="20" placeholder="Size array" value={size} onChange={sizeChange} required />
                </label>
                <select className="custom-select" name="kindSort" id="kind" value={kind} onChange={kindChange} required >
                    <option value="Horizontal">Horizontal</option>
                    <option value="Vertical">Vertical</option>
                    <option value="Snake">Snake</option>
                    <option value="Diagonal">Diagonal</option>
                    <option value="Snail">Snail</option>
                </select>
                <button className="btn btn-primary"    formMethod="get"  type="submit" name="action" onClick={displayArray} value="sort">Sort</button>
                <button className="btn btn-secondary"  formMethod="get"  type="submit" name="action" onClick={fileArray} value="file">File</button>
                <button className="btn btn-secondary"  formMethod="post" type="submit" name="action" onClick={dbRecordArray} value="db">DB record</button>
            </div>
            <hr/>
            <p>{name}</p>
            <table className="container table table-striped table-bordered table-dark">
                <RenderArray outputArray={outputArray}/>
            </table>
        </form>
        <hr/>
        <div className={"container my-5 alert alert-" + statusAlert[status]} role="alert">
            {message}
        </div>
    </>
    )
}
