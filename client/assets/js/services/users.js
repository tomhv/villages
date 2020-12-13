import axios from 'axios';

/**
 * @param {string} username
 * @param {string} email
 * @returns {Promise}
 */
export function signUp(username, email) {
  return axios({
    method: 'post',
    url: '/api/sign-up',
    data: { username, email },
  });
}
