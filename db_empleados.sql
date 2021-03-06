PGDMP                          x         	   empleados    12.2    12.2                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16393 	   empleados    DATABASE     �   CREATE DATABASE empleados WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Latin America.1252' LC_CTYPE = 'Spanish_Latin America.1252';
    DROP DATABASE empleados;
                postgres    false            �            1255    24608    sp_empleado()    FUNCTION     �   CREATE FUNCTION public.sp_empleado() RETURNS void
    LANGUAGE plpgsql
    AS $$
    BEGIN
      select * from tb02_productos;
    END;
$$;
 $   DROP FUNCTION public.sp_empleado();
       public          postgres    false            �            1259    24619    tb00_usuario    TABLE     �   CREATE TABLE public.tb00_usuario (
    id integer NOT NULL,
    usuario character varying(80),
    pass character varying(255),
    estado integer DEFAULT 2
);
     DROP TABLE public.tb00_usuario;
       public         heap    postgres    false            �            1259    24617    tb00_usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tb00_usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.tb00_usuario_id_seq;
       public          postgres    false    206                       0    0    tb00_usuario_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.tb00_usuario_id_seq OWNED BY public.tb00_usuario.id;
          public          postgres    false    205            �            1259    16431    tb01_empleados_id    SEQUENCE     y   CREATE SEQUENCE public.tb01_empleados_id
    START WITH 1
    INCREMENT BY 1
    MINVALUE 0
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.tb01_empleados_id;
       public          postgres    false            �            1259    16394    tb01_empleados    TABLE     �   CREATE TABLE public.tb01_empleados (
    id integer DEFAULT nextval('public.tb01_empleados_id'::regclass) NOT NULL,
    nombre character varying(255),
    apellido character varying(255),
    direccion character varying(255)
);
 "   DROP TABLE public.tb01_empleados;
       public         heap    postgres    false    203            �            1259    24589    tb02_test_id    SEQUENCE     }   CREATE SEQUENCE public.tb02_test_id
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 9999999999
    CACHE 1;
 #   DROP SEQUENCE public.tb02_test_id;
       public          postgres    false            �
           2604    24622    tb00_usuario id    DEFAULT     r   ALTER TABLE ONLY public.tb00_usuario ALTER COLUMN id SET DEFAULT nextval('public.tb00_usuario_id_seq'::regclass);
 >   ALTER TABLE public.tb00_usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    205    206    206                      0    24619    tb00_usuario 
   TABLE DATA           A   COPY public.tb00_usuario (id, usuario, pass, estado) FROM stdin;
    public          postgres    false    206                    0    16394    tb01_empleados 
   TABLE DATA           I   COPY public.tb01_empleados (id, nombre, apellido, direccion) FROM stdin;
    public          postgres    false    202   g                  0    0    tb00_usuario_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.tb00_usuario_id_seq', 1, true);
          public          postgres    false    205                       0    0    tb01_empleados_id    SEQUENCE SET     @   SELECT pg_catalog.setval('public.tb01_empleados_id', 14, true);
          public          postgres    false    203                       0    0    tb02_test_id    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.tb02_test_id', 1, false);
          public          postgres    false    204            �
           2606    24625    tb00_usuario tb00_usuario_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.tb00_usuario
    ADD CONSTRAINT tb00_usuario_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.tb00_usuario DROP CONSTRAINT tb00_usuario_pkey;
       public            postgres    false    206            �
           2606    16401 "   tb01_empleados tb01_empleados_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.tb01_empleados
    ADD CONSTRAINT tb01_empleados_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.tb01_empleados DROP CONSTRAINT tb01_empleados_pkey;
       public            postgres    false    202               @   x�3�L-*��+K,JO,�4�437733�07J�4KK��0�H�06�0344M5H37�4����� �         L   x�34��JMKK-*����M�KɯJ�L,�JI�)VH�.N����*N�NS Yi9�)�\�&Hz����	i����� 1�%�     