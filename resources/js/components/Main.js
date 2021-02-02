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


    render() {
        return (
            <div>
                <ul>
                    {this.renderHabits()}
                </ul>
                <AddingHabit   /> 

            </div>
        );
    }
}

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}