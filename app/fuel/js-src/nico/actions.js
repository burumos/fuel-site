import * as actionTypes from './actionTypes';

// jsonテキスト変更
export const changeJsonText = jsonText => {
  return {
    type: actionTypes.CHANGE_JSON_TEXT,
    payload: {
      jsonText
    }
  }
}

// マイリスト登録
export const register = jsonContent => {
  let action = {
    type: actionTypes.REGISTER,
      payload: {
        jsonText: jsonContent,
        jsonMessage: '',
        mylists: {},
      }
  };

  // 空チェック
  if (!jsonContent) {
    action.payload.jsonMessage = '入力して!!';
    return action;
  }

  // json形式チェック
  try {
    JSON.parse(jsonContent)
  } catch(err) {
    action.payload.jsonMessage = 'json形式で入力して!!';
    return action;
  }

  return dispatch => {
    window.fetch('/nico/register', {
      method: 'POST',
      body: jsonContent,
      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },

    })
      .then(response => response.json())
      .then(mylists => {
        action.payload.mylists = mylists;
        dispatch(action);
      });
  }
}

export const initMylists = mylists => {
  return {
    type: actionTypes.INIT_MYLISTS,
    payload: {
      mylists,
    }
  };
}
