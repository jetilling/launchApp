/*
 *  ACTION TYPES
 */
export const UPDATE_APP_NAME = 'UPDATE_APP_NAME';
export const UPDATE_DEVELOPER_STATUS = 'UPDATE_DEVELOPER_STATUS';




/**
 * action creators
 */

/* BEGIN SYNCHRONOUS ACTIONS */

export function updateAppName(value) {
  return { type: UPDATE_APP_NAME, value }
}

export function updateUserIsDeveloper(value) {
  return { type: UPDATE_DEVELOPER_STATUS, value}
}

/* END SYNCHRONOUS ACTIONS */

/* BEGIN ASYNCHRONOUS ACTIONS */

  /*
      As an example:
      export function asyncInputChange(value) {
        return (dispatch, getState) => {
          dispatch(synchronousAction(value))
          dispatch(anotherSynchronousAction())
        }
      }
  */

/* END ASYNCHRONOUS ACTIONS */