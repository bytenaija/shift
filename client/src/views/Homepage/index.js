import React, { useState, useContext, useEffect } from "react";
import { observer } from "mobx-react-lite";
import is_email from "is_email";
import { Fade } from "reactstrap";
import axios from "axios";
import { QuestionStoreContext } from "../../stores/QuestionStore";
import QuestionComponent from "./QuestionComponent";

const Homepage = props => {
  const { questions, setQuestions } = useContext(QuestionStoreContext);
  const [response, setResponse] = useState({});
  const [error, setError] = useState(false);
  const [errorMsg, setErrorMsg] = useState("");

  useEffect(() => {
    const getQuestions = async () => {
      const { data } = await axios.get("http://localhost:8000/api/questions");
      console.log(data);
      setQuestions(data);
    };

    getQuestions();
  }, [setQuestions]);

  const handleChange = ({ target }) => {
    console.log(target.name, target.value);
    const { name, value } = target;
    const currentResponse = { ...response };
    currentResponse[name] = value;
    setResponse(currentResponse);
  };

  const submitAnswers = async () => {
    setError(false);
    setErrorMsg("");

    // Validate user input
    if (Object.keys(response).length === 0 && response.constructor === Object) {
      setError(true);
      setErrorMsg("Please answer all questions before continuing");
      return;
    }
    for (let i = 1; i <= 10; i++) {
      if (typeof response[`question ${i}`] === "undefined") {
        setError(true);
        setErrorMsg("Please answer all questions before continuing");
        return;
      }
    }
    if (typeof response.email === "undefined") {
      setError(true);
      setErrorMsg("Please enter a valid email address");
      return;
    }
    if (!is_email(response.email)) {
      setError(true);
      setErrorMsg("Please enter a valid email address");
      return;
    }

    try {
      await axios.post("http://localhost:8000/api/answers", response, {
        headers: {
          "Content-Type": "application/json"
        }
      });
      props.history.push(`/${response.email}`);
    } catch (err) {
      setError(true);
      if (err.response) {
        setErrorMsg(err.response.data.message);
      } else {
        setErrorMsg(err.message);
      }
    }
  };

  return (
    <div className="homepage">
      <h4>Discover Your Perspective</h4>
      <p>
        Complete the 7 min test and get a detailed report of your lenses on the
        world.
      </p>
      <div className="form">
        <Fade in={error} className="alert alert-danger">
          {errorMsg}
        </Fade>
        {questions.map(question => (
          <QuestionComponent
            question={question}
            handleChange={handleChange}
            key={question.id}
          />
        ))}

        <div className="card email">
          <label htmlFor="email">Your Email</label>
          <input
            className="form-control"
            name="email"
            placeholder="you@example.com"
            onChange={handleChange}
          />
        </div>

        <button className="btn btn-primary" onClick={submitAnswers}>
          Save & Continue
        </button>
      </div>
    </div>
  );
};

export default observer(Homepage);
