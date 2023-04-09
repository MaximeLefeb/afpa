import React, { Component } from 'react';
import profilPicture from '../../img/logos/pp.svg';

export default class Commentaire extends Component {
    render() {
        return (
            <div className='shadow-2xl border bg-gray-100 py-5 px-10 rounded-lg mt-5'>
                <div className='text-lg text-blue-custom font-bold tracking-widest'>
                    <img width="50" src={profilPicture} alt="PP" className='inline mr-3'/>
                    {this.props.commentaire.name}
                </div>

                <div className='px-5 mt-5 tracking-widest'>
                    { this.props.commentaire.message}
                </div>

                <hr className='my-3'/>

                <div className='flex justify-end'>
                    <small className='text-gray-700'>Date: <i>{ new Date(this.props.commentaire.created_at).toLocaleDateString("fr") }</i></small>
                </div>
            </div>
        );
    }
}