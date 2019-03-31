import update from 'immutability-helper';
import {UPDATE_APP_NAME, 
        UPDATE_DEVELOPER_STATUS} from '../actions'

export function launchApp(state = {}, action) {
  switch (action.type) {
    case UPDATE_APP_NAME:
      return updateAppName(state, action.value)
    case UPDATE_DEVELOPER_STATUS:
      return updateUserIsDeveloper(state, action.value)
    default:
      return state
  }
}

function updateAppName(state, value) {
  return update(state, {name: {$set: value}})
}

function updateUserIsDeveloper(state, value) {
  return update(state, {userIsDeveloper: {$set: value}})
}