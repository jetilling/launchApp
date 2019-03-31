import React from 'react'
import { connect } from 'react-redux'
import {updateAppName} from '../../actions'
import '../../../styles/appName.css'

const mapStateToProps = (state, ownProps) => {
  return {
    name: state.name
  }
}

const mapDispatchToProps = (dispatch, ownProps) => {
  return {
    updateAppName: (e) => {dispatch(updateAppName(e.target.value))}
  }
}

const AppName = ({name, updateAppName}) =>  {

  return (
    <div>
      <h2>We're excited to see what you create!</h2>

      <h4>Let's start by giving your new app a name</h4>
      
      <div className="appName-question-block-1">
        <label for="app_name">What would you like to call your new project?</label>
        <input name="app_name" onChange={updateAppName} value={name} />
      </div>

      <div className="appName-question-block-2">
        <label>Tell us a little about your project!</label>
        <label>(This part is optional, but it does help our consultants know more about your app if you ever need help)</label>
        <textarea></textarea>
      </div>
      
    </div>
  )
}

const AppNameContainer = connect(
  mapStateToProps,
  mapDispatchToProps
)(AppName)

export default AppNameContainer