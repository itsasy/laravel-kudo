import axios from '../axios'

export default class KudoServices {
    createKudo(data) {
        return new Promise((resolve, reject) => {
            axios.post('/publications', {
                description: data.description,
                board_id: data.board_id,
                user_id: data.user_id
            }).then(response => {
                resolve(response);
            }).catch(error => {
                reject(error)
            })
        })
    }

    updateKudo(data) {
        return new Promise((resolve, reject) => {
            axios.put('/publications', {
                description: data.description,
            }).then(response => {
                resolve(response);
            }).catch(error => {
                reject(error)
            })
        })
    }
}
