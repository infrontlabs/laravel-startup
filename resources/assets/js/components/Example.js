import React, {
    Component
} from "react";
import ReactDOM from "react-dom";

export default class Example extends Component {
    render() {
        return <div > Example component! < /div>;
    }
}

if (document.getElementById("app")) {
    ReactDOM.render( < Example / > , document.getElementById("app"));
}
