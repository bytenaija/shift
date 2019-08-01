import React from "react";

const QuestionComponent = ({ question, handleChange }) => {
  return (
    <div className="card questions">
      <p>{question.question}</p>
      <div className="answers">
        <span className="disagree">Disagree</span>
        <input
          type="radio"
          value={1}
          name={`question ${question.id}`}
          onChange={handleChange}
        />
        <input
          type="radio"
          value={2}
          name={`question ${question.id}`}
          onChange={handleChange}
        />
        <input
          type="radio"
          value={3}
          name={`question ${question.id}`}
          onChange={handleChange}
        />
        <input
          type="radio"
          value={4}
          name={`question ${question.id}`}
          onChange={handleChange}
        />
        <input
          type="radio"
          value={5}
          name={`question ${question.id}`}
          onChange={handleChange}
        />
        <input
          type="radio"
          value={6}
          name={`question ${question.id}`}
          onChange={handleChange}
        />
        <input
          type="radio"
          value={7}
          name={`question ${question.id}`}
          onChange={handleChange}
        />
        <span className="agree">Agree</span>
      </div>
    </div>
  );
};

export default QuestionComponent;
