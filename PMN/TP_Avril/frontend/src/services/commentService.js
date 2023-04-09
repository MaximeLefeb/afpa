import axios from "axios";

export async function getAllBy(id) {
    return await axios.get(`http://localhost:3000/posts/${id}/comments`).then((response) => {
        return response.data;
    });
}

export async function post(form) {
    return await axios.post(`http://localhost:3000/posts/${form._id}/comments`, form).then((response) => {
        return response.data;
    });
}