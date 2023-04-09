import Commentaire from '../comments/Commentaire';
import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import { getBy } from '../../services/postService';
import { getAllBy } from '../../services/commentService';
import '../../css/PostDetails.css';
import { useNavigate } from "react-router-dom";
import arrowBack from '../../img/logos/arrowBack.svg';
import { Link } from 'react-router-dom';
import img1 from '../../img/img-1.jpg';
import { post as postCom} from '../../services/commentService';

function PostDetails() {
    const navigate = useNavigate();
    const { slug } = useParams();
    const [post, setPost] = useState(false);
    const [comments, setComments] = useState([]);
    const [name, setName] = useState([]);
    const [message, setMessage] = useState([]);

    useEffect(() => {
        async function fetchData() {
            const data     = await getBy(slug);
            const comments = await getAllBy(slug);

            setPost(data);
            setComments(comments);
        }

        fetchData();
    }, [slug]);

    function handleSubmitComment(e) {
        e.preventDefault();

        return postCom({
            "_id"    : slug,
            "name"   : name,
            "message": message
        }).then((rs) => {
            navigate(0);
        });
    }

    function handleName(e) {
        setName(e.target.value);
    }

    function handleMessage(e) {
        setMessage(e.target.value);
    }

    if (!post)
        return <div>Loading...</div>;

    function render() {
        return (
            <div className='px-20 md:px-0'>
                <div className='text-2xl font-bold font-sans tracking-widest text-blue-custom pb-5'>
                    <h1>
                        <Link to={`/`}><img src={ arrowBack } alt="Back" className='inline mr-3' width="30"/></Link>
                        {post.title}
                    </h1>
                </div>
    
                <hr/>
    
                <div className='p-5 tracking-widest text-zinc-800 flex gap-5'>
                    <div>
                        <img src={ img1 } alt="" className='max-h-460px rounded-lg shadow-2xl border'/>
                    </div>
    
                    <div className='w-full pl-5'>
                        {post.content}
                    </div>
                </div>
    
                <div className='flex my-3 justify-end'>
                    <small>Date: <i>{ new Date(post.created_at).toLocaleDateString("fr") }</i></small>
                </div>
    
                <div className='w-full text-2xl font-bold font-sans tracking-widest text-blue-custom pb-5'>
                    <h2>Commentaires :</h2>
                </div>
    
                <div className='flex flex-col md:flex-row gap-10'>
                    <div className='w-full'>
                        <div className='p-5'>
                            {
                                (comments.length > 0) ?
                                    comments.map((item, index) => {
                                        return <Commentaire key={index} commentaire={item} index={index} />
                                    })
                                :
                                    <div>
                                        Pas de commentaire sur cet article...
                                    </div>
                            }
                        </div>
                    </div>
    
                    <div className='w-full'>
                        <div className='p-5 mt-5'>
                            <form method="post" className='p-5 rounded-lg bg-gray-100 shadow-lg border' onSubmit={ handleSubmitComment }>
                                <h2 className='text-2xl font-bold font-sans tracking-widest text-gray-300 pb-5'>Add comment: </h2>
                                <input type="hidden" name="id" value={slug} />
                                <div>
                                    <input onChange={ handleName } name="name" type="text" className='shadow-lg py-3 px-5 py-100 rounded-full transition duration-150 ease-in-out focus:shadow-xl focus:outline-none' placeholder='Name'/>
                                </div>
    
                                <div className='mt-10'>
                                    <textarea onChange={ handleMessage } name="message" placeholder='Your comment here...' className='w-full p-5 rounded-lg border shadow-lg transition duration-150 ease-in-out focus:shadow-xl focus:outline-none'></textarea>
                                </div>
    
                                <div className='mt-10 flex justify-end'>
                                    <input type="submit" className='hover:cursor-pointer bg-blue-custom px-20 py-3 post-btn rounded-full text-white font-bold transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl'/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

    return render();
}

export default PostDetails;