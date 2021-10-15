import axios from '../axios'

export default class BoardList {
    getBoards() {
        return new Promise((resolve, reject) => {
            axios.get('/boards')
                .then(response => {
                    resolve(response)
                }).catch(error => {
                reject(error)
            })
        })
    }

    createBoard(data) {
        return new Promise((resolve, reject) => {
            axios.post('/boards', {
                title: data.description,
                worker_id: data.worker_id,
            }).then(response => {
               resolve(response);
            }).catch(error => {
                reject(error)
            })
        })
    }

    boardPublications(board_id){
        return new Promise((resolve,reject)=>{
            axios.get('/board-publications/' + board_id)
                .then(response=>{
                    resolve(response)
                }).catch(error =>{
                    reject(error)
            })
        })
    }
}
