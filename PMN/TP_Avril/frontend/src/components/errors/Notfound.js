import React, { Component } from 'react';
import { useRouteError } from "react-router-dom";

export default class Notfound extends Component {
    error = useRouteError();

    render() {
        return (
          <div id="error-page">
            <h1>Oops!</h1>

            <p>Sorry, an unexpected error has occurred.</p>

            <p>
              <i>{this.error.statusText || this.error.message}</i>
            </p>
          </div>
        );
    }
}