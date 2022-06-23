export const secToMs = (seconds) => seconds*1000
export const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms))
