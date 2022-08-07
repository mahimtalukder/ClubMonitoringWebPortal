import React, { useState } from "react";
import { isEmpty, omit } from "lodash";

const EditValidation = (callback) => {
    const [values, setValues] = useState({});
    const [errors, setErrors] = useState({});
    const [submitErrors, setSubmitErrors] = useState({});

    const validate = (event, name, value) => {
        switch (name) {
            case "name":
                if (value.length < 11) {
                    setErrors({
                        ...errors,
                        name: "name cannot be empty",
                    });
                } else {
                    let obj = omit(errors, "name");
                    setErrors(obj);
                }
                break;

            case "email":
                if (value === "") {
                    setErrors({
                        ...errors,
                        email: "email cannot be empty",
                    });
                } else {
                    let newObj = omit(errors, "email");
                    setErrors(newObj);
                }
                break;
            case "phone":
                if (value.length < 11) {
                    setErrors({
                        ...errors,
                        phone: "A phone number has to be least 11 digits",
                    });
                } else {
                    let newObj = omit(errors, "phone");
                    setErrors(newObj);
                }
                break;
            case "dob":
                if (value === "") {
                    setErrors({
                        ...errors,
                        dob: "A date of birth is required",
                    });
                } else {
                    let newObj = omit(errors, "dob");
                    setErrors(newObj);
                }
                break;
            case "address":
                if (value === "") {
                    setErrors({
                        ...errors,
                        address: "A date of birth is required",
                    });
                } else {
                    let newObj = omit(errors, "address");
                    setErrors(newObj);
                }
                break;
            case "designation":
                if (value === "") {
                    setErrors({
                        ...errors,
                        designation: "A date of birth is required",
                    });
                } else {
                    let newObj = omit(errors, "designation");
                    setErrors(newObj);
                }
                break;
            default:
                break;
        }
    };

    const handleChange = (event) => {
        //To stop default events
        event.persist();
        console.log(event);

        let name = event.target.name;
        let val = event.target.value;

        validate(event, name, val);
        //Let's set these values in state

        setValues({
            ...values,
            [name]: val,
        });
    };

    const handleSubmit = (event) => {
        if (event) event.preventDefault();

        if (
            Object.keys(errors).length === 0 &&
            Object.keys(values).length !== 0
        ) {
            let newObj = omit(submitErrors, "error");
            setSubmitErrors(newObj);
            callback();
        } else {
            setSubmitErrors({
                ...submitErrors,
                error: "Invalid Input",
            });
        }
    };

    return {
        values,
        errors,
        submitErrors,
        handleChange,
        handleSubmit,
    };
};

export default EditValidation;
