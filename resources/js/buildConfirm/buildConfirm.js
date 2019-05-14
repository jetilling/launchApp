import React from 'react';
import ReactDOM from 'react-dom';
import App from './app';

console.log('PROJECT DETAILS: ', window.projectDetails);

ReactDOM.render(
  <App csrfToken={window.csrfToken} projectDetails={window.projectDetails} />,
 document.getElementById('root'));