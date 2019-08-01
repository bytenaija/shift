import React, { useState, useEffect } from "react";
import { withRouter } from "react-router-dom";
import { Fade } from "reactstrap";
import axios from "axios";
import Display from "./Display";

const ResultPage = ({ match }) => {
  const [results, setResults] = useState([]);
  const [error, setError] = useState(false);
  const [errorMsg, setErrorMsg] = useState("");

  useEffect(() => {
    const getResults = async () => {
      setError(false);
      setErrorMsg("");
      let { email } = match.params;
      try {
        let { data } = await axios.get(
          `http://localhost:8000/api/answers/${email}`
        );
        setResults(data.perspective.split(""));
      } catch (err) {
        setError(true);
        if (err.response) {
          setErrorMsg(err.response.data.message);
        } else {
          setErrorMsg(err.message);
        }
      }
    };

    getResults();
  }, [match, setResults]);

  return (
    <div className="card results">
      <Fade in={error} className="alert alert-danger">
        {errorMsg}
      </Fade>
      <div className="perspective">
        <h3>Your Perspective</h3>
        <p>Your perspective type is {results.join("")}</p>
      </div>
      <div className="results-display">
        {/* Check the current dimension of the current result and supply the correct props to the display component */}
        {results.length > 0 &&
          results.map(result => {
            return result === "E" || result === "I" ? (
              <Display
                result={result}
                text={["Introversion (I)", "Extroversion (E)"]}
                key={result}
              />
            ) : result === "S" || result === "N" ? (
              <Display
                result={result}
                text={["Sensing (S)", "Intuition (I)"]}
                key={result}
              />
            ) : result === "T" || result === "F" ? (
              <Display
                result={result}
                text={["Thinking (T)", "Feeling (F)"]}
                key={result}
              />
            ) : (
              <Display
                result={result}
                text={["Judging (J)", "Percieving (P)"]}
                key={result}
              />
            );
          })}
      </div>
    </div>
  );
};

export default withRouter(ResultPage);
