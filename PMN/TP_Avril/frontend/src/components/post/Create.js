import React, { Component } from 'react';
import { post } from '../../services/postService';
import { Navigate } from "react-router-dom";
import { Link } from 'react-router-dom';
import arrowBack from '../../img/logos/arrowBack.svg';

export default class Create extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title   : '',
            content : '',
            redirect: false
        };

        this.handleSubmit        = this.handleSubmit.bind(this);
        this.handleChangeTitle   = this.handleChangeTitle.bind(this);
        this.handleChangeContent = this.handleChangeContent.bind(this);
    }

    /* Handler */
    handleChangeTitle(event) {
        this.setState({title: event.target.value});
    }
    handleChangeContent(event) {
        this.setState({content: event.target.value});
    }
    handleSubmit(event) {
        event.preventDefault();

        post({
            title  : this.state.title,
            content: this.state.content
        }).then(() => {
            this.setState({ redirect: true });
        });
    }

    /* Render */
    render() {
        if (this.state.redirect)
            return <Navigate to="/" replace={true} />

        return (
            
            <div>
                <Link to={`/`}><img src={ arrowBack } alt="Back" className='inline mr-3' width="30"/></Link>
                <h1 className='text-pink-500 text-center font-bold mb-5 text-2xl tracking-wide text-blue-custom'>Create new post</h1>

                <form method="POST" onSubmit={this.handleSubmit}>
                    <div>
                        <input require='true' value={this.state.title} onChange={this.handleChangeTitle} className="w-full bg-gray-200 rounded-full py-3 px-5 border-2 bg-grey-600 shadow-lg focus:outline-none hover:border-2 focus:border-blue-950 hover:border-blue-950 transition duration-150 ease-in-out" type="text" name="title" placeholder="Title" />
                    </div>

                    <div className='mt-10'>
                        <textarea require='true' value={this.state.content} onChange={this.handleChangeContent} placeholder='Content' className='h-80 w-full bg-gray-200 rounded-lg py-3 px-5 border-2 bg-grey-600 shadow-lg focus:outline-none hover:border-2 focus:border-blue-950 hover:border-blue-950 transition duration-150 ease-in-out' resize="false"></textarea>
                    </div>

                    <div className='flex justify-end mt-20'>
                        <input type="submit" value="Create" className='hover:cursor-pointer bg-blue-custom px-20 py-3 post-btn rounded-full text-white font-bold transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl'/>
                    </div>
                </form>
            </div>
        )
    }
}