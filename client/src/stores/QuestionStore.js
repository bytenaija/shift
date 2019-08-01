import { observable, action } from "mobx";
import { createContext } from "react";

class QuestionStore {
  @observable
  questions = [];

  @action
  setQuestions = questions => {
    this.questions = questions;
  };
}

export const QuestionStoreContext = createContext(new QuestionStore());
