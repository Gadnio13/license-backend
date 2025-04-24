CREATE TABLE licenses (
    id TEXT PRIMARY KEY,
    owner TEXT NOT NULL,
    product TEXT NOT NULL,
    creation_date INTEGER NOT NULL,
    ips TEXT NOT NULL -- comma-separated IPs
);
