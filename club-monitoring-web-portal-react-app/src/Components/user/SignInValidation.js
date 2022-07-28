import React, { useState } from 'react'
import {omit} from 'lodash'

const SignInValidation = (callback) => {
    const [values, setValues]= useState({});
    const [errors, setErrors] = useState({});
    const [submitErrors, setSubmitErrors] = useState({});

    const validate =(event, name, value) => {

        switch(name){
            case 'id':
                if(value.length>10 || value.length<10){
                    setErrors(
                       { ...errors,
                        id:'ID can contains 10 characters'}
                    )
                }
                else{
                    let obj = omit(errors,'id');
                    setErrors(obj);
                }
            break;

            case 'password':
                if(value.length<8){
                    setErrors({
                        ...errors,
                        password:'Password has to be least 8 characters'
                    })
                }else{

                    let newObj = omit(errors, "password");
                    setErrors(newObj);
                    
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

        validate(event,name,val);
        //Let's set these values in state

        setValues({
            ...values,
            [name]:val,
        })

    }

    const handleSubmit = (event) => {
        if(event) event.preventDefault();

        if(Object.keys(errors).length === 0 && Object.keys(values).length !==0 ){
            let newObj = omit(submitErrors, "error");
            setSubmitErrors(newObj);
            callback();

        }else{
            setSubmitErrors({
                ...submitErrors,
                error:'Invalid Input'
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

export default SignInValidation