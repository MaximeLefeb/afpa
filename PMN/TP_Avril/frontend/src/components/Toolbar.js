import React from 'react';
import '../css/Toolbar.css';
import { Link } from 'react-router-dom';
 
export default function Toolbar(f) {
    return (
        <div id="toolbar" className='px-5 py-3 rounded-full bg-gray-200 mb-10 shadow-lg flex place-content-between items-center'>
            <div>
                <span className='text-pink-500 font-bold'>Filter By:</span>
                <a href=".">
                    <span className='pl-1 text-blue-custom font-bold'> dates </span>
                    <svg className='text-blue-custom inline w-6 h-6' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fillRule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-.53 14.03a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V8.25a.75.75 0 00-1.5 0v5.69l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3z" clipRule="evenodd" />
                    </svg>
                </a>
            </div>

            <div className='flex gap-5 items-center'>
                <div>
                    <Link to="/posts/create">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="w-6 h-6">
                            <path fillRule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clipRule="evenodd" />
                        </svg>
                    </Link>
                </div>

                <div className='relative'>
                    <input onChange={f.updatePost} name="search" type="text" placeholder='Search' className='searchbar px-5 py-2 focus:outline-none hover:border-2 focus:border-blue-950 hover:border-blue-950 transition duration-150 ease-in-out'/>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="text-white absolute w-6 h-6 text-blue-custom inline search-logo">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
            </div>
        </div>
    );
}