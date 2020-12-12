import axios from 'axios';
import { baseUrl } from '@/services/api';

/**
 * @param {string} username
 * @param {string} email
 * @returns {Promise}
 */
export function signUp(username, email) {
  return axios({
    method: 'post',
    baseURL: baseUrl(),
    url: '/sign-up',
    data: { username, email },
  });
}
