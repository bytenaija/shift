import React from 'react';
import cx from 'classnames';

const Display = ({result, text}) =>{
    return(
        <div className="display">
            <span>
            {text[0]}
            </span>
            <div className="display-results">
            <div className={cx('colored', {
                right: ['E', 'N', 'F', 'P'].includes(result)
            })}></div>
            </div>
            <span>
            {text[1]}
            </span>
        </div>
    )
}

export default Display;