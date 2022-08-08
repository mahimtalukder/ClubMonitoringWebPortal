import {useState} from 'react'
import {omit} from 'lodash'

const CreateDirectorValidation = (callback) => {
    const [values, setValues] = useState({});
    const [errors, setErrors] = useState({});
    const [submitErrors, setSubmitErrors] = useState({});

    const validate = (event, name, value) => {

        switch (name) {
            case 'name':
                if (value == "") {
                    setErrors(
                        {
                            ...errors,
                            name: 'Name cannot be empty'
                        }
                    )
                } else {
                    let obj = omit(errors, 'name');
                    setErrors(obj);
                }
                break;

            case 'email':
                if (value == "") {
                    setErrors(
                        {
                            ...errors,
                            email: 'Email cannot be empty'
                        }
                    )
                } else {
                    let obj = omit(errors, 'email');
                    setErrors(obj);
                }
                break;

            case 'phone':
                if (value == "") {
                    setErrors(
                        {
                            ...errors,
                            phone: 'Invalid phone number'
                        }
                    )
                }
                else if(value.length > 11){
                    setErrors(
                        {
                            ...errors,
                            phone: 'Invalid phone number'
                        }
                    )
                }
                else {
                    let obj = omit(errors, 'phone');
                    setErrors(obj);
                }
                break;

            default:
                break;
        }

    }

    const handleChange = (event) => {
        //To stop default events
        event.persist();

        let name = event.target.name;
        let val = event.target.value;

        setValues({
            ...values,
            [name]: val,
        })

        validate(event, name, val);
        //Let's set these values in state

    }

    const handleSubmit = (event) => {
        if (event) event.preventDefault();

        if (Object.keys(errors).length === 0 && Object.keys(values).length !== 0) {
            let newObj = omit(submitErrors, "error");
            setSubmitErrors(newObj);
            callback();

        } else {
            setSubmitErrors({
                ...submitErrors,
                error: 'Invalid Input'
            })
        }
    }

    return {
        values,
        errors,
        submitErrors,
        handleChange,
        handleSubmit
    }
}

export default CreateDirectorValidation
