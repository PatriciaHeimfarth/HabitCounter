import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class AddingHabit extends Component {

    constructor(props) {
        super(props);
        this.state = {
            newHabit: {
                name: '',
                streak: 0
            }
        }

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleInput = this.handleInput.bind(this);
    }
    handleInput(key, e) {

        var state = Object.assign({}, this.state.newHabit);
        state[key] = e.target.value;
        this.setState({ newHabit: state });
    }

    handleSubmit(e) {

        e.preventDefault();
        this.props.onAdd(this.state.newHabit);
    }

    render() {
        const divStyle = {

        }

        return (
            <div>
                <h2> Add new habit </h2>
                <div style={divStyle}>

                    <form onSubmit={this.handleSubmit}>
                        <label> Name:
               { }
                            <input type="text" onChange={(e) => this.handleInput('name', e)} />
                        </label>


                        <input type="submit" value="Submit" />
                    </form>
                </div>
            </div>)
    }
}

export default AddingHabit;