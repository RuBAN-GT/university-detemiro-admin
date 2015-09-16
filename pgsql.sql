--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_with_oids = false;

--
-- Name: groups; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE groups (
    code character varying(60) NOT NULL,
    name text,
    info text
);


--
-- Name: groups_rules; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE groups_rules (
    group_code character varying(60) NOT NULL,
    rule_code character varying(60) NOT NULL
);


--
-- Name: options; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE options (
    family character varying(60) NOT NULL,
    code character varying(60) NOT NULL,
    value text
);


--
-- Name: rules; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE rules (
    code character varying(60) NOT NULL,
    info text
);


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE users (
    id bigint NOT NULL,
    login character varying(60) NOT NULL,
    password text NOT NULL,
    salt character varying(30) NOT NULL,
    hash character varying(26),
    registration timestamp without time zone,
    last_login timestamp without time zone
);


--
-- Name: users_fields; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE users_fields (
    name character varying(60) NOT NULL,
    require boolean NOT NULL,
    value text,
    title text,
    info text,
    priority numeric DEFAULT 0,
    type character varying(60) NOT NULL
);


--
-- Name: users_groups; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE users_groups (
    user_id bigint NOT NULL,
    group_code character varying(60) NOT NULL
);


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: users_properties; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE users_properties (
    user_id bigint NOT NULL,
    family character varying(60) NOT NULL,
    code character varying(60) NOT NULL,
    value text
);


--
-- Name: users_rules; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE users_rules (
    user_id bigint NOT NULL,
    rule_code character varying(60) NOT NULL
);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO groups (code, name, info) VALUES ('admins', 'Администраторы', '');
INSERT INTO groups (code, name, info) VALUES ('guests', 'Гости', '');
INSERT INTO groups (code, name, info) VALUES ('users', 'Пользователи', 'Обычные пользователи.');
INSERT INTO groups (code, name, info) VALUES ('moderators', 'Модераторы', 'Общая группа модераторов.');


--
-- Data for Name: groups_rules; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO groups_rules (group_code, rule_code) VALUES ('admins', 'admin');
INSERT INTO groups_rules (group_code, rule_code) VALUES ('guests', 'guest');
INSERT INTO groups_rules (group_code, rule_code) VALUES ('admins', 'public');
INSERT INTO groups_rules (group_code, rule_code) VALUES ('users', 'public');
INSERT INTO groups_rules (group_code, rule_code) VALUES ('moderators', 'moderate');
INSERT INTO groups_rules (group_code, rule_code) VALUES ('moderators', 'public');


--
-- Data for Name: options; Type: TABLE DATA; Schema: public; Owner: -
--



--
-- Data for Name: rules; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO rules (code, info) VALUES ('admin', 'Абсолютное право.');
INSERT INTO rules (code, info) VALUES ('guest', 'Стандартное право гостя.');
INSERT INTO rules (code, info) VALUES ('moderate', 'Общий доступ к панели модерирования.');
INSERT INTO rules (code, info) VALUES ('moderate-core', 'Управление важными компонентами системы.');
INSERT INTO rules (code, info) VALUES ('moderate-users', 'Право на управление пользователями.');
INSERT INTO rules (code, info) VALUES ('public', 'Право авторизованного пользователя.');


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO users (id, login, password, salt, hash, registration, last_login) VALUES (1, 'admin', '$2a$10$j0d1cUS0gJJJcHqZ0yimjOzEcuQFrAKC5fPqviVy5Nke5l4M/6ZCO', '$2a$10$j0d1cUS0gJJJcHqZ0yimjR$', null, '2014-05-26 20:28:30', '2015-09-14 00:54:17');


--
-- Data for Name: users_fields; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO users_fields (name, require, value, title, info, type) VALUES ('avatar', false, '', 'Аватар', 'Аватар пользователя', 'image');
INSERT INTO users_fields (name, require, value, title, info, type) VALUES ('mail', false, '', 'E-mail', '', 'mail');
INSERT INTO users_fields (name, require, value, title, info, type) VALUES ('name', false, '', 'Имя пользователя', 'Имя и фамилия', 'string');


--
-- Data for Name: users_groups; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO users_groups (user_id, group_code) VALUES (1, 'admins');

--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('users_id_seq', 6, true);


--
-- Data for Name: users_properties; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO users_properties (user_id, family, code, value) VALUES (1, 'notes', 'index', 'Привет мир!');

--
-- Data for Name: users_rules; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO users_rules (user_id, rule_code) VALUES (1, 'admin');


--
-- Name: groups_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_pk PRIMARY KEY (code);


--
-- Name: groups_rules_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups_rules
    ADD CONSTRAINT groups_rules_pk PRIMARY KEY (rule_code, group_code);


--
-- Name: options_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY options
    ADD CONSTRAINT options_pk PRIMARY KEY (family, code);


--
-- Name: rules_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY rules
    ADD CONSTRAINT rules_pk PRIMARY KEY (code);


--
-- Name: users_fields_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_fields
    ADD CONSTRAINT users_fields_pk PRIMARY KEY (name);


--
-- Name: users_groups_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT users_groups_pk PRIMARY KEY (user_id, group_code);


--
-- Name: users_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pk PRIMARY KEY (id);


--
-- Name: users_properties_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_properties
    ADD CONSTRAINT users_properties_pk PRIMARY KEY (user_id, family, code);


--
-- Name: users_rules_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_rules
    ADD CONSTRAINT users_rules_pk PRIMARY KEY (user_id, rule_code);


--
-- Name: users_uq; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_uq UNIQUE (login);


--
-- Name: group_rules_fk_group; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups_rules
    ADD CONSTRAINT group_rules_fk_group FOREIGN KEY (group_code) REFERENCES groups(code) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: group_rules_fk_rules; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY groups_rules
    ADD CONSTRAINT group_rules_fk_rules FOREIGN KEY (rule_code) REFERENCES rules(code) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users_groups_fk_group; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT users_groups_fk_group FOREIGN KEY (group_code) REFERENCES groups(code) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users_groups_fk_user; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT users_groups_fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users_properties_fk_user; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_properties
    ADD CONSTRAINT users_properties_fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users_rules_fk_rule; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_rules
    ADD CONSTRAINT users_rules_fk_rule FOREIGN KEY (rule_code) REFERENCES rules(code) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users_rules_fk_user; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users_rules
    ADD CONSTRAINT users_rules_fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

