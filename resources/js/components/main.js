import React from 'react'
import PropTypes from 'prop-types'
import AppNameContainer from './2_appName/appName';

const Main = ({currentStep, name}) =>  {

  return (
    <div className="main">
      <div className="left-side-main">
        <AppNameContainer />
      </div>
      <div className="right-side-main">
        <div className="browser-window">
          <div className="browser-upper">
            <div className="open-close-button-container">
              <div className="browser-close-button"></div>
              <div className="browser-min-button"></div>
              <div className="browser-open-button"></div>
            </div>
          </div>
          {name}
        </div>
      </div>
    </div>
  )
}

Main.propTypes = {
};

export default Main