import axios from '../axios'

export default class BoardList {
    getBoards() {
        return new Promise((resolve, reject) => {
            axios.get('/boards')
                .then(res => {
                    resolve(res)
                }).catch(err => {
                reject(err)
            })
        })
    }
}
