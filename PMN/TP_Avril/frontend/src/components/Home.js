import React, { Component } from 'react';
import Toolbar from './Toolbar';
import Post from './Post';
import { get } from '../services/postService';

export default class Home extends Component {
    state = { post: [] }

    componentDidMount() {
        get().then((rs) => {
            const post = rs;

            this.setState({ post });
        });
    }

    handleChangeSearch = async (e) => {
        let post = [];

        if (e.target.value !== '') {
            post = this.state.post.filter((item) => {
                return item.title.toLowerCase().indexOf(e.target.value.toLowerCase()) !== -1;
            });
        } else {
            await get().then((rs) => {
                post = rs;
            });
        }

        this.setState({ post });
        this.render();
    };

    render() {
        return (
            <div>
                <Toolbar updatePost={this.handleChangeSearch.bind(this)} />

                <div className='listPost h-50em lg:grid lg:grid-cols-4 gap-20 overflow-y-auto p-5 md:flex md:flex-col'>
                    {
                        (this.state.post.length > 0) ?
                            this.state.post.map((item, index) => {
                                return <Post key={index} post={item} index={index} />
                            })
                        :
                            <div>
                                <p className='mt-5 text-center'>Il n'y a aucun article pour le moment...</p>
                            </div> 
                        
                    }
                </div>
            </div>
        );
    }
}