--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: clients; Type: TABLE; Schema: public; Owner: bojana; Tablespace: 
--

CREATE TABLE clients (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE clients OWNER TO bojana;

--
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: bojana
--

CREATE SEQUENCE clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clients_id_seq OWNER TO bojana;

--
-- Name: clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bojana
--

ALTER SEQUENCE clients_id_seq OWNED BY clients.id;


--
-- Name: stylists; Type: TABLE; Schema: public; Owner: bojana; Tablespace: 
--

CREATE TABLE stylists (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE stylists OWNER TO bojana;

--
-- Name: stylists_id_seq; Type: SEQUENCE; Schema: public; Owner: bojana
--

CREATE SEQUENCE stylists_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stylists_id_seq OWNER TO bojana;

--
-- Name: stylists_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: bojana
--

ALTER SEQUENCE stylists_id_seq OWNED BY stylists.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: bojana
--

ALTER TABLE ONLY clients ALTER COLUMN id SET DEFAULT nextval('clients_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: bojana
--

ALTER TABLE ONLY stylists ALTER COLUMN id SET DEFAULT nextval('stylists_id_seq'::regclass);


--
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: bojana
--

COPY clients (id, name) FROM stdin;
10	Melba
11	Nicholas
12	Mike
13	Mike
14	Lorna
15	Meg
16	Trudie
17	Ollie
18	Melba
19	Nicholas
20	Mike
21	Lorna
22	Meg
23	Trudie
24	Ollie
25	Melba
26	Nicholas
27	Mike
\.


--
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bojana
--

SELECT pg_catalog.setval('clients_id_seq', 27, true);


--
-- Data for Name: stylists; Type: TABLE DATA; Schema: public; Owner: bojana
--

COPY stylists (id, name) FROM stdin;
608	Eleanor
\.


--
-- Name: stylists_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bojana
--

SELECT pg_catalog.setval('stylists_id_seq', 608, true);


--
-- Name: clients_pkey; Type: CONSTRAINT; Schema: public; Owner: bojana; Tablespace: 
--

ALTER TABLE ONLY clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- Name: stylists_pkey; Type: CONSTRAINT; Schema: public; Owner: bojana; Tablespace: 
--

ALTER TABLE ONLY stylists
    ADD CONSTRAINT stylists_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: bojana
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM bojana;
GRANT ALL ON SCHEMA public TO bojana;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

