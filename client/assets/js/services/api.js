export function baseUrl() {
  if ('production' == process.env.NODE_ENV) {
    return 'https://api.villages.tomhv.uk';
  }

  return 'http://localhost:8075';
}
