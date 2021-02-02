import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import AddingHabit from './AddingHabit';

class Main extends Component {
    constructor() {

        super();
        this.state = {
            habits: [],
        }
    }

    componentDidMount() {
        fetch('/api/habits')
            .then(response => {
                return response.json();
            })
            .then(habits => {
                this.setState({ habits });
            });
    }

    renderHabits() {
        return this.state.habits.map(habit => {
            return (
                <li key={habit.id} >
                    { habit.name}
                    { habit.streak}
                </li>
            );
        })
    }

    handleAddHabit(habit) {
        fetch('api/habits/', {
            method: 'post',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },

            body: JSON.stringify(habit)
        })
            .then(response => {
                return response.json();
            })
            .then(data => {
                this.setState((prevState) => ({
                    habits: prevState.habits.concat(data),
                    currentHabit: data
                }))
            })

    }


    render() {
        return (
            <div>
                <ul>
                    {this.renderHabits()}
                </ul>
                <AddingHabit onAdd={this.handleAddHabit} />

            </div>
        );
    }
}

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}