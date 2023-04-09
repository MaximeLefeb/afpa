import React, { Component } from 'react';
import '../css/Header.css';

export default class Header extends Component {
    render() {
        return (
            <div id="header" className='columns-12 flex justify-center font-bold text-4xl text-white mx-auto p-5 font-sans shadow-lg bg-gradient-to-r from-pink-500 to-pink-600'>
                MonBlog.com
            </div>
        );
    }
}