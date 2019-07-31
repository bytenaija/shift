import React, {useState, useEffect} from 'react';
import {withRouter} from 'react-router-dom';
import axios from 'axios';
import Display from './Display';

const ResultPage = ({match}) =>{
const [results, setResults] = useState([]);

useEffect(() =>{
    const getResults = async () =>{
        let {email} = match.params;
        try{
            let {data} = await axios.get(`http://localhost:8000/api/answers/${email}`)
            console.log(data)
            setResults(data.perspective.split(""));
        }catch(err){
            console.log(err)
        }
    }

    getResults();
}, [match, setResults]);

return(
<div className="card results">
   <div className="perspective">
       <h3>Your Perspective</h3>
       <p>Your perspective type is {results.join('')}</p>
    </div>
   <div className="results-display">
    {results.length > 0 && results.map(result => {
        return (
            result === 'E' || result=== 'I' ? <Display result={result} text={['Introversion (I)', 'Extroversion (E)']} key={result} /> : 
            result === 'S' || result=== 'N' ? <Display result={result} text={['Sensing (S)', 'Intuition (I)']} key={result}  /> :
            result === 'T' || result=== 'F' ? <Display result={result} text={['Thinking (T)', 'Feeling (F)']} key={result}  /> :
            <Display result={result} text={['Judging (J)', 'Percieving (P)']} key={result}  /> 
        )

    })}
    </div>
    
</div>)
}

export default withRouter(ResultPage);