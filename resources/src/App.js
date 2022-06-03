import './App.css';
import React from "react";
import axios from 'axios';

class SortingForm extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            url: 'http://localhost:8000/api',
            sizeArray: '',
            kindSort: 'Horizontal',
            message: 'Input data:)',
            name: '',
            outputArray: []
        }

        this.setSize = this.setSize.bind(this);
        this.setKind = this.setKind.bind(this);
        this.handleWrite = this.handleWrite.bind(this);
        this.handleDownload = this.handleDownload.bind(this);
    }

    setSize = event => {
        this.setState({sizeArray: event.target.value});
    }

    setKind = event => {
        this.setState({kindSort: event.target.value});
    }

    handleWrite = event => {
        event.preventDefault();

        axios({
            url: this.state.url + `/sort`,
            method: event.target.formMethod,
            params: {
                sizeArray: this.state.sizeArray,
                kindSort: this.state.kindSort,
                action: event.target.value
            },
            responseType: 'json'
        })
            .then(response => {
                this.setState({
                    outputArray: response.data.outputArray,
                    name: response.data.name,
                    message: response.data.message
                });
            })
    }

    handleDownload = event => {
        event.preventDefault();

        axios({
            url: this.state.url + `/download`,
            method: event.target.formMethod,
            params: {
                kindSort: this.state.kindSort
            },
            responseType: 'blob'
        })
            .then(response => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', this.state.kindSort +'.txt'); //or any other extension
                document.body.appendChild(link);
                link.click();
            })
    }


  render() {
    return (
        <>
        <form >
          <div className="container-fluid">
              <label className="mx-3">
                  <input type="number" id="size" name="sizeArray" step="1" min="2" max="20" placeholder="Size" value={this.state.sizeArray} required onChange={this.setSize}/>
              </label>
              <select className="custom-select" name="kindSort" id="kind" value={this.state.kindSort} required onChange={this.setKind}>
                  <option value="Horizontal">Horizontal</option>
                  <option value="Vertical">Vertical</option>
                  <option value="Snake">Snake</option>
                  <option value="Diagonal">Diagonal</option>
                  <option value="Snail">Snail</option>
              </select>
              <button className="btn btn-primary"   onClick={this.handleWrite}    formMethod="get"  type="submit" name="action" value="sort">Sort</button>
              <button className="btn btn-secondary" onClick={this.handleWrite}    formMethod="get"  type="submit" name="action" value="file">File</button>
              <button className="btn btn-secondary" onClick={this.handleWrite}    formMethod="post" type="submit" name="action" value="db">DB record</button>
              <button className="btn btn-secondary" onClick={this.handleDownload} formMethod="get"  type="submit" name="download">Download</button>
          </div>
            <p>{this.state.name}</p>
            <table className="table table-striped table-bordered table-dark">
                <tbody>
                {this.state.outputArray?.map((row, index) => (
                    <tr key={index}>
                        {row.map((item, index) => (
                            <td key={index}>
                                {item}
                            </td>
                        ))}
                    </tr>
                ))}
                </tbody>
            </table>
        </form>
      <div className="alert alert-dark" role="alert">
          {this.state.message}
      </div>
        </>
    );
  }
}

function App() {
  return (
    <div className="App">
      <SortingForm/>
    </div>
  );
}

export default App;
