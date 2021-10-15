import axios from '../axios'

export default class WorkerServices {
    getWorkers() {
        return new Promise((resolve, reject) => {
            axios.get('/workers')
                .then(response => {
                    resolve(response)
                }).catch(error => {
                reject(error)
            })
        })
    }
}
