The Principles of the MVC Design Pattern
========================================

After researching various articles on the internet I came up with the following descriptions of the principles of the Model-View-Controller design pattern:

The MVC paradigm is a way of breaking an application, or even just a piece of an application's interface, into three parts: the model, the view, and the controller. MVC was originally developed to map the traditional input, processing, output roles into the GUI realm:

    Input      --> Processing --> Output 
    Controller --> Model      --> View


Model
------
A model is an object representing data or even activity, e.g. a database table or even some plant-floor production-machine process.
The model manages the behavior and data of the application domain, responds to requests for information about its state and responds to instructions to change state.
The model represents enterprise data and the business rules that govern access to and updates of this data. Often the model serves as a software approximation to a real-world process, so simple real-world modeling techniques apply when defining the model.
The model is the piece that represents the state and low-level behavior of the component. It manages the state and conducts all transformations on that state. The model has no specific knowledge of either its controllers or its views. The view is the piece that manages the visual display of the state represented by the model. A model can have more than one view.
Note that the model may not necessarily have a persistent data store (database), but if it does it may access it through a separate Data Access Object (DAO).


View
-----
A view is some form of visualisation of the state of the model.
The view manages the graphical and/or textual output to the portion of the bitmapped display that is allocated to its application. Instead of a bitmapped display the view may generate HTML or PDF output.
The view renders the contents of a model. It accesses enterprise data through the model and specifies how that data should be presented.
The view is responsible for mapping graphics onto a device. A view typically has a one to one correspondence with a display surface and knows how to render to it. A view attaches to a model and renders its contents to the display surface.


Controller
-----------
A controller offers facilities to change the state of the model. The controller interprets the mouse and keyboard inputs from the user, commanding the model and/or the view to change as appropriate.
A controller is the means by which the user interacts with the application. A controller accepts input from the user and instructs the model and view to perform actions based on that input. In effect, the controller is responsible for mapping end-user action to application response.
The controller translates interactions with the view into actions to be performed by the model. In a stand-alone GUI client, user interactions could be button clicks or menu selections, whereas in a Web application they appear as HTTP GET and POST requests. The actions performed by the model include activating business processes or changing the state of the model. Based on the user interactions and the outcome of the model actions, the controller responds by selecting an appropriate view.
The controller is the piece that manages user interaction with the model. It provides the mechanism by which changes are made to the state of the model.

In the Java language the MVC Design Pattern is described as having the following components:

An application model with its data representation and business logic.
Views that provide data presentation and user input.
A controller to dispatch requests and control flow.
The purpose of the MVC pattern is to separate the model from the view so that changes to the view can be implemented, or even additional views created, without having to refactor the model.


How they fit together
---------------------
The model, view and controller are intimately related and in constant contact. Therefore, they must reference each other. The picture below illustrates the basic Model-View-Controller relationship:

    The basic MVC relationship = 

    User -> uses -> Controller -> manipulates -> Model/Aplication -> updates -> View -> sees -> User


Even though the above diagram is incredibly simple, there are some people who try to read more into it than is really there, and they attempt to enforce their interpretations as "rules" which define what is "proper" MVC. To put it as simply as possible the MVC pattern requires the following:

It must have a minimum of three components, each of which performs the responsibilities of either the Model, the View or the Controller, as identified above. You may include as many additional components as you like, such as a Data Access Object (DAO) to communicate with a relational database.

There is a flow of data between each of those components so that each may carry out its designated responsibilities on that data. What is not specified in MVC is how the mechanics of that flow are to be implemented. The data may be pushed by the Model into the View, it may be pulled by the View from the Model, or pulled into an intermediary (such as the Controller or an Observer) before it is pushed into the View. It does not matter how the data flows, just that it does flow. The actual mechanics are an implementation detail and can therefore be left to the implementor.
The MVC pattern does not identify from where each of these components is instantiated and called. Is there a mystical 4th component which oversees the 3 others, or can one of them oversee and direct the other two? As this is not directly specified in MVC the actual mechanics can be treated as a separate implementation detail.


Note the following:
-------------------
HTML output can only be generated and output in one place - the View.
Business rules can only be applied in one place - the Model.
SQL statements can only be generated and executed in one place - the DAO (which may be inside the Model).

There are some people who criticise my interpretation of the "rules" of MVC as it is different from theirs, and therefore wrong, but who is to say that their interpretation is the only one that should be allowed to exist?