import React, { Component } from 'react';
import img1 from '../img/img-1.jpg';
import img2 from '../img/img-2.jpg';
import img3 from '../img/img-3.jpg';
import img4 from '../img/img-4.jpg';
import img5 from '../img/img-5.jpg';
import img6 from '../img/img-6.jpg';
import img7 from '../img/img-7.jpg';
import img8 from '../img/img-8.jpg';
import img9 from '../img/img-9.jpg';
import img10 from '../img/img-10.jpg';
import { Link } from 'react-router-dom';
import '../css/Post.css';
import { deleteBy } from '../services/postService';
import { Navigate } from "react-router-dom";

export default class Post extends Component {
    constructor(props) {
        super(props);

        this.state = { redirect: false };
    }

    loadImg(index) {
        let img = [
            img1,
            img2,
            img3,
            img4,
            img5,
            img6,
            img7,
            img8,
            img9,
            img10
        ];

        return img[index];
    }

    randomIntFromInterval(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);

        console.log(min + " " + max);

        return Math.floor(Math.random() * (max - min + 1) + min)
    }

    truncate (str, length) {
        return str.length > length ? str.substring(0, length - 3) + "..." : str;
    }

    handleClick = (id) => () => {
        deleteBy(id).then(() => {
            this.setState({ redirect: true });
        });
    }

    render() {
        if (this.state.redirect)
            return <Navigate to="/" replace={true} />

        return (
            <div className='w-full card mx-auto font-sans flex flex-col gap-10 items-center relative'>
                <div>
                    <span className='bg-blue-custom inline absolute rounded-full p-4 trash hover:cursor-pointer shadow-lg' onClick={this.handleClick(this.props.post._id)}>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" className="w-6 h-6">
                            <path fillRule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clipRule="evenodd" />
                        </svg>
                    </span>
                    <img className='post-img' src={this.loadImg(this.randomIntFromInterval(0, 9))} alt=""/>
                </div>

                <div className='px-3'>
                    <h4 className='mb-5 font-bold text-blue-custom tracking-wider'> {this.truncate(this.props.post.title, 70)} </h4>

                    <hr/>

                    <p className='mt-5 text-gray-600 tracking-wider post-text'> {this.truncate(this.props.post.content, 120)} </p>
                </div>

                <div>
                    <Link to={`/posts/${this.props.post._id}`} className='bg-blue-custom px-20 py-3 post-btn rounded-full text-white font-bold transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl'> Consulter </Link>
                </div>
            </div>
        );
    }
}