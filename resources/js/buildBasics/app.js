import React, { Component } from 'react'
import axios from 'axios'
import '../../styles/buildBasics.css'

class App extends Component {

  constructor() {
    super()
    this.state = {
      projectName: '',
      framework: '',
      routing: '',
      projectType: 'laravel'
    }

    this.handleProjectNameChange = this.handleProjectNameChange.bind(this)
    this.selectFramework = this.selectFramework.bind(this)
    this.submitBasics = this.submitBasics.bind(this)
    this.selectRouting = this.selectRouting.bind(this)
  }

  handleProjectNameChange(event) {
    this.setState({projectName: event.target.value});
  }

  selectFramework(framework) {
    let routing = framework == 'vue'? 'server_side' : ''
    this.setState({framework: framework, routing: routing});
  }

  selectRouting(routingType) {
    this.setState({routing: routingType});
  }

  submitBasics() {
    let body = {
      name: this.state.projectName,
      frontend_framework: this.state.framework,
      routing: this.state.routing == 'skip'? 'server_side': this.state.routing, //server_side is the default
      project_type: this.state.projectType
    }

    axios.post('http://localhost:8080/build/basics', body, {headers: {'csrf-token': csrfToken}}).then(res => {
      console.log(res.data)
      if (res.data.success) window.location.href = '/build/confirm'
    })
    // Next need to setup web route to capture this, save it to the database and redirect to confirmation page
    // confirmation page has option to go back and edit
    // once confirmed then send request to golang server to build
    // once built redirect to page with more details

    // will also need to setup simple auth of some sort - maybe track ip and limit to 5 calls? but should start
    // with request for entry code and email
  }

  render() {

    let routingHtml = ''
    if (this.state.framework.length && this.state.framework === 'react') {
      routingHtml = <div className="question-grouping">
      <h4 className="question-label">Let's talk about routing and rendering</h4>
      <div className="question-item-container">
        <div className={`question-item ${this.state.routing === 'server_side'? 'selected': ''}`} 
            onClick={() => this.selectRouting('server_side')}>Keep the routing on the server</div>
        <div className={`question-item ${this.state.routing === 'react'? 'selected': ''}`} 
            onClick={() => this.selectRouting('react')}>Use React router for frontend routing</div>
        <div className={`question-item ${this.state.routing === 'skip'? 'selected': ''}`} 
            onClick={() => this.selectRouting('skip')}>Skip</div>
      </div>
    </div>
    }

    return (
      <div className="main">
        <div className="left-side">
          <h1 className="title">The Basics</h1>
          <p className="desc">Put some info here on what is happening</p>
        </div>
        
        <div className="right-side">
          <div className="question-grouping">
            <h4 className="question-label">What should we call your project?</h4>
            <input className="question-input" value={this.state.projectName} onChange={this.handleProjectNameChange} />
          </div>

          <div className="question-grouping">
            <h4 className="question-label">Select a backend language</h4>
            <div className="question-item-container">
              <div className="framework-item selected">PHP / Laravel</div>
              <div className="framework-item coming-soon">GoLang</div>
              <div className="framework-item coming-soon">Elixir / Pheonix</div>
              <div className="framework-item coming-soon">Node / Express</div>
            </div>
          </div>

          <div className="question-grouping">
            <h4 className="question-label">Select a frontend JavaScript framework</h4>
            <div className="question-item-container">
              <div className={`question-item ${this.state.framework === 'react'? 'selected': ''}`} onClick={() => this.selectFramework('react')}>React with Redux</div>
              <div className={`question-item ${this.state.framework === 'vue'? 'selected': ''}`} onClick={() =>this.selectFramework('vue')}>Vue.js</div>
              <div className={`question-item ${this.state.framework === 'jQuery'? 'selected': ''}`} onClick={() => this.selectFramework('jQuery')}>jQuery</div>
            </div>
          </div>

          {routingHtml}

          <div className="continue-btn-container">
            <button className="continue-btn" onClick={this.submitBasics}>Continue</button>
          </div>
        </div>
      </div>
    )
  }
}

export default App;