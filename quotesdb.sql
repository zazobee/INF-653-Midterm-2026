CREATE TABLE authors (
    id int PRIMARY KEY,
    author varchar(50) NOT NULL 
);

CREATE TABLE categories (
    id int PRIMARY KEY,
    category varchar(20) NOT NULL
);

CREATE TABLE quotes (
    id int PRIMARY KEY 
    quote varchar(255) NOT NULL,
    author_id int NOT NULL,
    category_id int NOT NULL,
    FOREIGN KEY (author_id) REFERENCES authors(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);


INSERT INTO authors (author) VALUES 
('The Incredibles'), 
('f5ve'), 
('Hadestown'), 
('Stephen Chbosky'), 
('WandaVision');


INSERT INTO categories (category) VALUES 
('Book'), 
('Movie'), 
('Play'), 
('Song'), 
('TV Show');

INSERT INTO quotes (quote, author_id, category_id) VALUES 
('But what is grief if not love perservering', 5, 5), 
('We accept the love we think we deserve', 4, 1), 
('And the coldest night of the coldest year comes right before the spring', 3, 3), 
('In every galaxy I chose you everytime', 2, 4), 
('No capes', 1, 2);



