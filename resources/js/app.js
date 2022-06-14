require('/css/main.css')
require('./bootstrap')

import {render} from "react-dom";
import Form from "./components/Form";

render(<Form />, document.getElementById('app'));
