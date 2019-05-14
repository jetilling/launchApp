import React, { Component } from 'react'
import axios from 'axios'
import '../../styles/buildConfirm.css'

class App extends Component {

  constructor() {
    super()
    this.state = {}

    this.confirmBuild = this.confirmBuild.bind(this)

  }

  confirmBuild() {

    axios.post('http://localhost:8080/build/confirm', projectDetails, {headers: {'csrf-token': csrfToken}}).then(res => {
      console.log(res.data)
      if (res.data.success) window.location.href = '/build/complete'
    })
    // Next need to setup web route to capture this, save it to the database and redirect to confirmation page
    // confirmation page has option to go back and edit
    // once confirmed then send request to golang server to build
    // once built redirect to page with more details

    // will also need to setup simple auth of some sort - maybe track ip and limit to 5 calls? but should start
    // with request for entry code and email
  }

  render(){

    return (
      <div>
        <h1>Almost there!</h1> 
        <p>Let's just check over things one more time</p>

        <div>
          <h2>The Basics</h2>

          <h3>Title:</h3>
          <span>{projectDetails.name}</span>

          <h3>Project Type:</h3>
          <span>{projectDetails.project_type}</span>
          
          <h3>Frontend Framework:</h3>
          <span>{projectDetails.frontend_framework}</span>

          <h3>Routing Type:</h3>
          <span>{projectDetails.routing}</span>
        </div>

        <button onClick={this.confirmBuild}>Create</button>
      </div>
    )
  }

}

export default App;