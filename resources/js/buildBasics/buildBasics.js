import React from 'react';
import ReactDOM from 'react-dom';
import App from './app';

ReactDOM.render(
  <App csrfToken={window.csrfToken} />,
 document.getElementById('root'));