import './css/App.css';
import React from "react";
import { Routes, Route } from 'react-router-dom';
import Home from './components/Home';
import PostDetails from './components/post/PostDetails';
import Header from './components/Header';
import Create from './components/post/Create';

export default function App() {
  return (
    <div className="App pb-20">
      <Header />

      <div className="container mx-auto mt-10">
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/posts/create" element={<Create />} />
          <Route path="/posts/:slug" element={<PostDetails />} />
        </Routes>
      </div>
    </div>
  );
}